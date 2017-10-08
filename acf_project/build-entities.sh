#!/bin/bash

## Generate xml
sudo php bin/console doctrine:mapping:convert xml ./src/AppBundle/Resources/config/doctrine/metadata/orm --from-database --force

## Once the metadata files are generated, you can ask Doctrine to import the schema 
## and build related entity classes by executing the following two commands
sudo php bin/console doctrine:mapping:import AppBundle annotation
sudo php bin/console doctrine:generate:entities AppBundle

## The last command generated the getters and setters, but it left back ups
find . -name \*.php~ -delete
