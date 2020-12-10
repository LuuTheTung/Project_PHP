# 20192-web-programming-project
# Group 3 - ICT K61
# Healthcare website

## Group member:
1. Doan Cao Thanh Long - 20162513
2. Luu The Tung - 20164518
3. Do Minh Hieu - 20161504
4. Bui Duc Hieu - 20167174

## Installation
1. Install XAMPP Server [on Window](https://pureinfotech.com/install-xampp-windows-10/) or [on Linux](https://vitux.com/how-to-install-xampp-on-your-ubuntu-18-04-lts-system/) and start the services
2. Clone this project to /htdocs/ in XAMPP installation folder
3. Create database 'suckhoe' in phpmyadmin (localhost)
4. Create username 'admin' with password 'admin' and grant access to 'suckhoe' database
5. Import suckhoe.sql
6. create virtualhost (optional)

## How to use
1. Turn on XAMPP server.
2. Access: http://localhost/SUCKHOEbyMTP/src/application/

## UX/UI mockup
Please see: https://www.figma.com/files/project/7965019/SUCKHOE

## Health Organization Account
``` 
username: Admin
password: Admin
```
## Citizen Account
``` 
username: User
password: User
```
## Work Distribution
### Long
- Backend developer for Form/Statistic model.
- Develop controller for Citizen and HO (Health Organization).
- Design Database schema.
### Tung
- Frontend developer.
- Desgin views.
- Handle asset and scripts.
- Implement htmlencode.

### Hieu Do
- UI/UX designer and Mockup creator.
- Implement HO form and HO statistics views.
- Design architecture: MVC and DAO.
- Design ER, Usecase, Communication and Class diagram.
- Documentation: Slide.

### Hieu Bui
- Backend developer for Account/Citizen/HO model.
- Develop controller for Base, Authorization and Citizen.
- Implement MVC/database and PDO.
- Implement session, hashing and routing.
