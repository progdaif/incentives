# Description 

Backend Engineer task - “Incentives Program”


You are developing the “Incentives Program.” Users can earn bonus points by performing specific actions. At the moment, there are three types of actions. Each of them results in a different amount of points which user receives:
- delivery: 1 point for every action
- rideshare: 1 point for every action
- rent: 2 points per day of the duration. 

There are also boosters in the system. Users can earn more points by doing “X” actions in a “Z” time frame. For example:
- 5 deliveries in 2 hours result in 5 additional points.
- 5 rideshares in 8 hours result in 10 additional points. 
- Rent has no boosters.
Each booster connects to a specific action type. So boosters for deliveries don’t apply to rideshares.

Each action can be part of only one booster, and boosters can be active only at a specific time. The system will be extended with new boosters in the future.

Points can have an expiry date. For example, points from boosters are valid only for one month and then lost unless the user withdraws them before the expiry date. Points for actions don’t expire at the moment. Users can cash out points with an exchange rate of 1 point equals 1 dollar.

For example:
Mark did seven deliveries in 2 hours, three rideshares in 4 hours, and rented a book for three days. His current balance is 21. After a month, his balance would shrink to 16.

Please follow the below:
Write a code that calculates a user's balance at any given time. 
Document your decisions. 
Focus on the readability of the code. 
Follow the best industry practices. 
Please add test cases. 

# Installation

Copy the ./.env.example file to be ./.env and add your database
credentials then
You need to run ./deploy.sh to install the project
make sure that ./deploy.sh has the right permissions

# Documentation

All documentation files will be in ./docs

=========================================================================================

# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
