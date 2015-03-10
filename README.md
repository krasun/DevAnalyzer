# DevAnalyzer

Tries to analyze developer public accounts and gives summary essence for developer. This application 
was written for semifinal of ["UA Web Challenge 2014"](http://uawebchallenge.com/).

## Installation and configuration
    
### 1. Installation
    
Via [Vagrant](https://www.vagrantup.com/), clone repository and vagrant up: 

    $ git clone git@github.com:krasun/DevAnalyzer.git dev-analyzer
    $ cd ./dev-analyzer && vagrant up
    
### 2. Configuration 
    
Edit configuration file: 
    
    $ cp config/parameters.php.dist config/parameters.php

### 3. Samples 

Try to search [http://10.0.0.10:8000/search?fullName=&nickname=krasun&email=&location=&phoneNumber=&limit=5](http://10.0.0.10:8000/search?fullName=&nickname=krasun&email=&location=&phoneNumber=&limit=5) or 
try to view profile [http://10.0.0.10:8000/report?developer%5Bdummy%5D=5454fbb0346d6&developer%5Bgithub%5D=krasun](http://10.0.0.10:8000/report?developer%5Bdummy%5D=5454fbb0346d6&developer%5Bgithub%5D=krasun).