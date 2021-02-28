## Project Name: **Online Exam System**
###  Team: BarcaForca 

### Details of the Project:
This is an online exam system web site with admin and users functionalities. An admin can add a new admin and control users. For instance, he can disable a user and again enable him and also can delete the user from system. For adding question, admin will have a form to add question and he can also see all the questions entered so far. Admin can also delete the questions.

For users there will be sign up and forgot password functionalities. After completing sign-up and log in, a user can see his profile and also will be able to update his profile. As this a mcq based online exam system, a user can take participate in an exam. After completing the exam, he can start the exam again and also will be able to see the answers of the questions.
### Project Breakdown:
(For better understanding of project file structure please see the flow chart that is uploaded in the "Any additional document" in the google form.)

The project files are written in the exam folder and the sub folders contain files for individual task. All the admin functionalities in the admin subfolder. In the classes subfolder, all the php codes for admin functionalities have been written. 

Then in the config subfolder, the configuration of the database have been written. gcss subfolder contains css files for this project. In the incl subfolder, header and footer are created. helpers subfolder contains Format.php file to validate this program. js subfolder contains javascript files and lib subfolder contains Database.php file to establish connection with the database and all the crud codes are written there. And the Session.php file contains session functionalities for this program. 

For users, the functionalities are written in the files those are directly belongs to the main exam folder. All the crud and php codes for users are written in the studentValidation.php file. 
Process.php file contains all the php codes for mcq exam and its result. getregister.php and getlogin.php and main.js will perform jQuery and ajax functionalities for validating data such as if a user is registered or not, registration and other validation functionalities without loading the page.

Project Video is in Video folder and Project description is in Description folder.

### Project Bugs:

I wrote the program when the user will reset his password, the token sent to this email will be deleted from the database. Somehow this functionality is not working.

### Future Plans:

I have plans that users will be able to enroll for courses he wants. Course purchase option, giving exam for an individual course and exam category under courses. The big challenge will be making timed exam for each courses and their sub exams. I have also plan for proctored exam using tensorflow.js