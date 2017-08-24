#Demo link
http://rtcamp-env.ap-south-1.elasticbeanstalk.com

# rtcamp facebook challange

1. user login through facebook , where it will ask  for authentication and providing email_id , profile_photo , user_photos  and it will    redirect you to the index page of the website with succesfull login.
2. Now your whole album list will come in the website like cover album , profile pictures and mobile uploads
3. just click on the album and you will get a slide show of of your pictures . 
4. now select the album this is a complete ajax and jquery process select the album by "checkbox"which you will find below the every        album and for single download click on  download button and you can select multiple album and click "download selected" .
5. now jquery(ajax) collects the selected images and it will start creating zip of your album with "php script", while creating zip you     will  find a "spinner" rotating on your window, when process  completes you will find a album report which will ask you to "Download     zip folder " you created .
6. there is one more option which ask you to "download all" and you will download a full zip of your albums

# library used
1. http://spin.js.org (for spinner)
2. http://www.w3schools.com/bootstrap/ (for bootstrap and html css)
3. http://www.javatpoint.com/jquery-tutorial (for jquery complete help)
4. facebook library

#How to use these codes => DOWNLOAD THE ZIP FROM GITHUB

1. go to https://developers.facebook.com/ and add a new app
2. then select www the give a name to your app
3. them email address
4. and finish come to your app page open its setting then you will get two things
5. APP ID & SECRET ID 
6. At bottom of the page it will ask you for "site url" give the path of your website where you want to redirect the informations(you     can use localhost also)
7. now come to the files you downloaded from github and open "fbconfig.php"
8. and type APP ID & SECRET ID AND SITE URL


And run it & enjoy .........

(NOTE:- If you want to get the user photos on everyones login then you have to go for app review)
#How To go for app rewiew 
1. come to settings fill all the blocks like privacy url, there are so many free websites who can do this for you
   like https://www.freeprivacypolicy.com
2. Then uplaod a App Icon
3. Fill "name place"
4. then change localhost and give some specific site url 
5. come to app review click of sumbit review and it will ask you for various approvals select USER_PHOTOS
6. then create a small screencast(small video) of your website from starting to ending make sure did this part carefully , i have a      bad experience facebook canceled my review one time and still doing this for approval after submiting apply for submit
7. and wait for five days 



i hope so this will work for you..

# Issues in this project

this project is completely ready but there is one part of the assignment where i have to move the images in google picasa , earlier it was done by zend with gdata library Aouth libraries but after 20 april 2015 google canceld the Aouth 1.0 and they come to 2.0
and zend has no library who works for this, 
the differene is REFRESH TOCKENS which is there .. i did my best to do so but sadly i didnt get the solution

so i did this with zend as much i can do .

Thank you..
