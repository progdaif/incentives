Steps I followed to do the task:

- I decided to work with lumen wich is lightweight laravel version.
- I installed passport for Authentication, spatiePermissions for managing user permissions.
and l5-Repository for working with repository pattern.
- Installation required creating config folder also changes in bootstrap/app.php, 
app/Providers/AuthServiceProvider.php and app/Models/User.php

- I started from database I created tables : users , actions , user_points
and boosters. You can find them in database/migrations.

- I created the main models and repositories with the basic needed
relationships. Also super calsses related to them.

- I created a service for calculating points for  user and depended on 
criteria to do this.

- I created route linked to the controller that service is injected Into.

- I updated core classes for better architectural design.

- I created 5 test cases for user permissions, expired points, exchanged points and normal 
points at specific time.
