﻿#!/bin/sh

base_path=$( cd "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )

#cat $base_path/wp_pg_schema.sql | ssh database 'cat > /tmp/wp_pg_schema.sql'

ssh database << EOF

yum -y install pgloader
dropdb wordpress2 || true

createdb wordpress2

#psql wordpress2 < /tmp/wp_pg_schema.sql

cat > /tmp/pgload.cmd << EOS

LOAD DATABASE
     FROM      mysql://root@localhost/wordpress
     INTO postgresql:///wordpress2

 WITH quote identifiers

 CAST 
     type datetime
     to "timestamp without time zone" drop not null drop default
          using zero-dates-to-null

;

EOS

echo /tmp/pgload.cmd

pgloader /tmp/pgload.cmd

psql wordpress2 << EOS

ALTER SEQUENCE wordpress.wp_commentmeta_meta_id_seq RENAME TO wp_commentmeta_seq;
ALTER SEQUENCE wordpress."wp_comments_comment_ID_seq" RENAME TO wp_comments_seq;
ALTER SEQUENCE wordpress.wp_links_link_id_seq RENAME TO wp_links_seq;
ALTER SEQUENCE wordpress.wp_options_option_id_seq RENAME TO wp_postmeta_seq;
ALTER SEQUENCE wordpress.wp_postmeta_meta_id_seq RENAME TO wp_options_seq;
ALTER SEQUENCE wordpress."wp_posts_ID_seq" RENAME TO wp_posts_seq;
ALTER SEQUENCE wordpress.wp_term_taxonomy_term_taxonomy_id_seq RENAME TO wp_term_taxonomy_seq;
ALTER SEQUENCE wordpress.wp_termmeta_meta_id_seq RENAME TO wp_terms_seq;
ALTER SEQUENCE wordpress.wp_terms_term_id_seq RENAME TO wp_termmeta_seq;
ALTER SEQUENCE wordpress.wp_usermeta_umeta_id_seq RENAME TO wp_usermeta_seq;
ALTER SEQUENCE wordpress."wp_users_ID_seq" RENAME TO wp_users_seq;

EOS

EOF

echo Export complete to wordpress2 db

cat > wp-data.dump << EOF
truncate wp_commentmeta       ;
truncate wp_comments          ;
truncate wp_links             ;
truncate wp_options           ;
truncate wp_postmeta          ;
truncate wp_posts             ;
truncate wp_term_relationships;
truncate wp_term_taxonomy     ;
truncate wp_termmeta          ;
truncate wp_terms             ;
truncate wp_usermeta          ;
truncate wp_users             ;
EOF


ssh database pg_dump -a postgresql:///wordpress2 >> wp-data.dump
#cat /tmp/wp.dump.1 | sed 's/OWNER TO root/OWNER TO "wordpress"/g' > /tmp/wp.dump.2 
#cat /tmp/wp.dump.2 | sed 's/SET client_encoding = '\''SQL_ASCII'\''/SET client_encoding = '\''UTF8'\''/g' > wp.dump
#cat /tmp/wp.dump.3 | sed 's/timestamp without time zone,/timestamp without time zone DEFAULT \"now\"\(\) NOT NULL,/g' > wp.dump

#ssh database dropdb wordpress2