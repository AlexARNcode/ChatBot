<h1 align="center">:computer: ChatBot</h1>
<h3 align="center">A flexible chatbot</h3>   
<br/>
<br/>

![TypeScript](https://img.shields.io/badge/typescript-%23007ACC.svg?style=for-the-badge&logo=typescript&logoColor=white)
![React](https://img.shields.io/badge/react-%2320232a.svg?style=for-the-badge&logo=react&logoColor=%2361DAFB)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Symfony](https://img.shields.io/badge/symfony-%23000000.svg?style=for-the-badge&logo=symfony&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

## About The Project

A simple chatbot on which you can add/delete your questions and answers through an administration panel.

Ask him any question, it will search for an answer in its database and answer you!

## How to set it up

1. Clone this repository : `git clone git@github.com:AlexARNcode/ChatBot.git`
2. Go to the 'front' folder : `cd front`
3. Install the frontend libraries : `npm install` 
4. Launch the frontend web server : `npm start`
5. Go back to the root folder : `cd ..`
6. Install the backend libraries : `composer install` 
7. Configure your `.env.local file` to connect the project to your database
8. Play the SQL migration : `php bin/console doctrine:migrations:migrate`
9. Launch the backend web server : `symfony server:start`.
10. Go to http://localhost:3000/
11. :sunglasses: Enjoy !
