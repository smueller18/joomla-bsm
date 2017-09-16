#!/bin/sh

# if earlier versions were already built
rm -rf deploy/*

mkdir -p deploy/pkg_bsm/packages

zip -r deploy/pkg_bsm/packages/mod_bsm_matchtable.zip mod_bsm_matchtable
zip -r deploy/pkg_bsm/packages/mod_bsm_table.zip mod_bsm_table
cp pkg_bsm.xml deploy/pkg_bsm/

zip -r deploy/pkg_bsm.zip deploy/pkg_bsm
