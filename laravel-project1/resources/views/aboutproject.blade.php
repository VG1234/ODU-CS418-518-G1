<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About project</title>
</head>
<body class="antialiased" style="font-family: 'Nunito', sans-serif; background-color: #5a5a5c;">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="min-height: 90vh !important; color: #ede0e0"> 
        <div style="display: block;margin: 6%;margin-left: 19%; font-size: 22px">
            <h1 style="font-size:43px; font-weight: 500;color:#efaf3a; margin-left: 22%">Falsity Survey Website</h1>
            <p>The website contains a Main Dashboard(shown for all the users), Users tab (shown only for admin), search bar to perform keyword search and profile to
                change the information of the user(enable/disable two factor
                authentication, password change)</p>
            <p>Shows all the articles stored in database (ES/ MySQL) in Main Dashboard. </p>
            <p>When User selects a article it will show panels:-</p>
            <p><b style="color: #85c240;">Left Panel:</b> A piece of fake news, including the title, author, date, and the main text.</p>
            <p><b style="color: #85c240;">Right Panel:</b> Contain 3 tabs</p>
            <p><b style="color: #85c240;">Tab1: </b>Credibility dashboard: showing metadata of relevant papers, main claims</p>
            <p><b style="color: #85c240;">Tab2: </b>Snopes webpage: showing the debunking information downloaded from <a href="snopes.com" style="color: #d6d6f7">Snopes.com</a></p>
            <p><b style="color: #85c240;">Tab3: </b>Survey page: showing a survey form</p>
            <p>We are using Elasticsearch to perform search of fake news in left panel (implementing only simple search).</p>
            <p><b style="color: #85c240;">Languages:</b> PHP, HTML</p>
            <p><b style="color: #85c240;">Framework:</b> Laravel</p>
            <p><b style="color: #85c240;">Stylings:</b> CSS, Tailwind</p>
            <p><b style="color: #85c240;">Search Engine:</b> Elasticsearch</p>
        </div> 
    </div>
</body>
</html>