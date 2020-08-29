#!/bin/sh -x

set -e

base_path=$( cd "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )
echo $base_path

cd $base_path

ansible-playbook -i ${base_path}/loadlab.hosts ${base_path}/loadlab-postgres.yml