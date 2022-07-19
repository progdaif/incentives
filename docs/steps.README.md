Steps I followed to do the task:

- I decided to work with lumen wich is lightweight laravel version
- I installed passport for Authentication, spatiePermissions for managing user permissions
and l5-Repository for working with repository pattern.
- Installation required creating config folder also changes in bootstrap/app.php, 
app/Providers/AuthServiceProvider.php and app/Models/User.php

- I started from database I created tables : users , actions , user_points
and boosters. You can find them in database/migrations