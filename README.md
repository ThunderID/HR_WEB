## Installing HR WEB

1. Pull / Clone this package
2. Running composer update
3. Running php artisan optimize
4. Cek database configuration
5. Enable service provider in config/app.php line 150 - 158
6. Running migrate : php artisan hr:migrate MigrateHR
7. Running seed : php artisan hr:seed SeedHR
8. Login Using email : hr@thunderid.com, password : admin

## What's New?
1. Packaging composer.json (for person, doclate, organisation) using new versioning (1.2.0)
2. Changing database structure (documentation on going) on person, work and contact
3. API moved to APIConnector/INENGINE (For internal developing), changes to external developing by change aliases on config/app.php line 212 to OUTENGINE (for details look app/APIConnector)

## Contributing



### License


