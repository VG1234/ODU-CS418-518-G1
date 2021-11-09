@Project: Miss Information Survey Website <br>
@author: Venugopal Nagandla

<b>About Project</b><br>
<p>This is a web portal to perform a survey on misinformation. The website will display two panels. </p>
            <p><b style="color: #85c240;">Left Panel:</b> a piece of fake news, including the title, author, date, and the main text.</p>
            <p><b style="color: #85c240;">Right Panel:</b> Contain 3 tabs</p>
            <p><b style="color: #85c240;">Tab1: </b>Credibility dashboard: showing metadata of relevant papers, main claims</p>
            <p><b style="color: #85c240;">Tab2: </b>Snopes webpage: showing the debunking information downloaded from <a href="snopes.com" style="color: #d6d6f7">Snopes.com</a></p>
            <p><b style="color: #85c240;">Tab3: </b>Survey page: showing a survey form</p>
            <p>We are using Elasticsearch to perform search of fake news in left panel (implementing only simple search).</p><br>

<b>About Code</b><br>
The FastifyData folder contains the python code to get the relevant papers from the semanticscholar search.
