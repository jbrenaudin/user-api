# user-api 
[![Build Status](https://travis-ci.org/jbrenaudin/user-api.svg?branch=master)](https://travis-ci.org/jbrenaudin/user-api)
[![Maintainability](https://api.codeclimate.com/v1/badges/de7fe72e2faf9ccb468a/maintainability)](https://codeclimate.com/github/jbrenaudin/user-api/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/de7fe72e2faf9ccb468a/test_coverage)](https://codeclimate.com/github/jbrenaudin/user-api/test_coverage)
[![Heroku](http://heroku-badge.herokuapp.com/?app=user-api-production&svg=1&root=users)](https://dashboard.heroku.com/apps/user-api-production)

### Install dependencies
composer install

### Run unit tests
composer test

### Example

#### Get all users

on staging :
```bash
curl https://user-api-staging.herokuapp.com/users?fields=id,firstname,surname
```

on production :
```bash
curl https://user-api-staging.herokuapp.com/users?fields=id,firstname,surname
```