# Trade Offer Pro
Complete custom PHP/MySQL lead-generation site.
![Home Page](https://github.com/OsamaSalamat/Renova-Plus/blob/dd69b6fa7dcf98c23091f001a57e9d47a01fabd9/Screenshot%202026-09-16%20200320.png)
![Home Page](https://github.com/OsamaSalamat/Renova-Plus/blob/dd69b6fa7dcf98c23091f001a57e9d47a01fabd9/Screenshot%202026-09-16%20200343.png)
Features: responsive landing page, promotion countdown, lead modal, secure database storage, CSRF protection, PDO prepared statements, admin login, promotion CMS, settings, lead CRM, CSV export and notification-email hook.

## XAMPP
Copy to `C:\xampp\htdocs\trade-offer-pro`, start Apache/MySQL, import `database/database.sql`, then open `http://localhost/trade-offer-pro/`.

Admin: `http://localhost/trade-offer-pro/admin/login.php`
Demo email: `admin@example.com`
Demo password: `ChangeMe123!`

If you imported an older SQL file/database, **drop the old `trade_offer_pro` database and import this SQL again**, because this version deliberately resets the demo admin password hash.

## Production
Use HTTPS, change the admin credentials, configure SMTP/transactional email, add the client's actual Privacy Policy and collection notice, implement retention/deletion procedures, and obtain legal review for the client's specific Australian Privacy Act/APP obligations. Technical safeguards do not by themselves guarantee legal compliance.
