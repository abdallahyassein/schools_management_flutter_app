/* login page */

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:provider/provider.dart';
import 'package:schools_management/animation/FadeAnimation.dart';
import 'package:schools_management/provider/parent.dart';
import 'package:schools_management/provider/teacher.dart';
import 'package:schools_management/screens/parent/main_parent_page.dart';
import 'package:schools_management/screens/teacher/main_teacher_page.dart';

class Login extends StatefulWidget {
  @override
  _LoginState createState() => _LoginState();
}

class _LoginState extends State<Login> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>(); // the key for the form
  TextEditingController user = new TextEditingController(); // the controller for the usename that user will put in the text field
  TextEditingController pass = new TextEditingController(); // the controller for the password that user will put in the text field

  int selectedRadio = 1; // variable for radiobutton




// control the radiobutton using this function
  setSelectedRadio(int val) {
    setState(() {
      selectedRadio = val;
    });
  }

// show alert function we will use if the user entered a wrong user name or password
  showAlert(String title, String content) {
    showDialog(
        context: context,
        builder: (BuildContext context) {
          return AlertDialog(
            title: Text(title),
            content: Text(content),
            actions: [
              FlatButton(
                child: Text("Ok"),
                onPressed: () {
                  Navigator.of(context).push(
                      new MaterialPageRoute(builder: (context) => Login()));
                },
              )
            ],
          );
        });
  }

// we will use CircularProgressIndicator while logging in
  showLoadingProgress() {
    showDialog(
        context: context,
        builder: (BuildContext context) {
          return AlertDialog(
            content: Container(
                alignment: Alignment.center,
                height: 100,
                width: 100,
                child: Center(
              child: CircularProgressIndicator(
                valueColor: new AlwaysStoppedAnimation<Color>(Colors.blue),
              ),
            )),
          );
        });
  }

  // login function
   _login() async {
    
      if (_formKey.currentState.validate()) { // check if all the conditionsthe we put on validators are right

         showLoadingProgress(); // show CircularProgressIndicator

       
        if (selectedRadio == 1) { // if the radio button on parent then login using parent provider

        Provider.of<Parent>(context).loginParentAndGetInf(user.text, pass.text).then((state){ // pass username and password that user entered 

        
        if(state){ // if the function returned true 
         
          Navigator.of(context).pushNamed(MainParentPage.routeName); // go to the Main page for parent
        }else{
          showAlert('Error', 'You Entered Wrong username or password'); // otherwise show an Alert
        }

        });

       
         
        } else if (selectedRadio == 2) { // if the radio button on teacher then login using teacher provider

             Provider.of<Teacher>(context).loginTeacherAndGetInf(user.text, pass.text).then((state){ // pass username and password that user entered 

        
        if(state){ // if the function returned true 
         
          Navigator.of(context).pushNamed(MainTeacherPage.routeName); // go to the Main page for teacher
        }else{
          showAlert('Error', 'You Entered Wrong username or password'); // otherwise show an Alert
        }

        });

        }

    
      }
    }
  

 
    
 
  

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body:  Container(
        width: double.infinity,
        decoration: BoxDecoration(
            gradient: LinearGradient(begin: Alignment.topCenter, colors: [
          Color.fromRGBO(154, 233, 178, 1),
          Color.fromRGBO(173, 187, 238, 1),
        ])),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            SizedBox(
              height: 100,
            ),
            Padding(
              padding: EdgeInsets.all(20),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: <Widget>[
                  Center(
                      child: FadeAnimation(
                          1,
                          Text(
                            "Login",
                            style: GoogleFonts.antic(
                              textStyle: TextStyle(
                                  color: Colors.white,
                                  fontWeight: FontWeight.bold),
                              fontSize: 70,
                            ),
                          ))),
                  SizedBox(
                    height: 10,
                  ),
                  Center(
                      child: FadeAnimation(
                          1.3,
                          Text(
                            "Welcome Back",
                            style: GoogleFonts.asar(
                              textStyle: TextStyle(
                                  color: Colors.white,
                                  fontWeight: FontWeight.bold),
                              fontSize: 20,
                            ),
                          ))),
                ],
              ),
            ),
            SizedBox(
              height: 20,
            ),
            Expanded(
              child: Container(
                decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.only(
                        topLeft: Radius.circular(60),
                        topRight: Radius.circular(60))),
                child: Padding(
                  padding: EdgeInsets.all(30),
                  child: SingleChildScrollView(
                    child: Column(
                      children: <Widget>[
                        SizedBox(
                          height: 60,
                        ),
                        FadeAnimation(
                            1.4,
                            Container(
                              decoration: BoxDecoration(
                                  color: Colors.white,
                                  borderRadius: BorderRadius.circular(10),
                                  boxShadow: [
                                    BoxShadow(
                                        color: Color.fromRGBO(225, 95, 27, .3),
                                        blurRadius: 20,
                                        offset: Offset(0, 10))
                                  ]),
                              child: Form(
                                key: _formKey,
                                child: Column(
                                  children: <Widget>[
                                    Container(
                                      width: double.infinity,
                                      padding: EdgeInsets.all(10),
                                      decoration: BoxDecoration(
                                          border: Border(
                                              bottom: BorderSide(
                                                  color: Colors.grey[200]))),
                                      child: TextFormField(
                                        controller: user,
                                        decoration: InputDecoration(
                                            hintText: "Username",
                                            hintStyle:
                                                TextStyle(color: Colors.grey),
                                            border: InputBorder.none),
                                        keyboardType: TextInputType.text,
                                        validator: (value) { //check if the username is not less than two characters
                                          if (value.length < 2) {
                                            return '$value length not long enough';
                                          } else {
                                            return null;
                                          }
                                        },
                                      ),
                                    ),
                                    Container(
                                      width: double.infinity,
                                      padding: EdgeInsets.all(10),
                                      decoration: BoxDecoration(
                                          border: Border(
                                              bottom: BorderSide(
                                                  color: Colors.grey[200]))),
                                      child: TextFormField(
                                        controller: pass,
                                        obscureText: true,
                                        decoration: InputDecoration(
                                            hintText: "Password",
                                            hintStyle:
                                                TextStyle(color: Colors.grey),
                                            border: InputBorder.none),
                                        keyboardType:
                                            TextInputType.visiblePassword,
                                      ),
                                    ),
                                    Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.center,
                                      children: <Widget>[
                                        Radio(
                                          activeColor: Colors.green,
                                          groupValue: selectedRadio,
                                          value: 1,
                                          onChanged: (val) {
                                            print(val);
                                            setSelectedRadio(val);
                                          },
                                        ),
                                        Text('parent',
                                            style: GoogleFonts.asar(
                                              textStyle: TextStyle(
                                                  color: Colors.green[300],
                                                  fontWeight: FontWeight.bold),
                                              fontSize: 20,
                                            )),
                                        Radio(
                                          activeColor: Colors.green,
                                          groupValue: selectedRadio,
                                          value: 2,
                                          onChanged: (val) {
                                            print(val);
                                            setSelectedRadio(val);
                                          },
                                        ),
                                        Text('teacher',
                                            style: GoogleFonts.asar(
                                              textStyle: TextStyle(
                                                  color: Colors.green[300],
                                                  fontWeight: FontWeight.bold),
                                              fontSize: 20,
                                            )),
                                      ],
                                    ),
                                  ],
                                ),
                              ),
                            )),
                        SizedBox(
                          height: 40,
                        ),
                        FadeAnimation(
                            1.6,
                            Container(
                              height: 50,
                              margin: EdgeInsets.symmetric(horizontal: 50),
                              decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(50),
                                  color: Color.fromRGBO(154, 233, 178, 1)),
                              child: Center(
                                child: FlatButton(
                                    child: Text(
                                      "Login",
                                      style: TextStyle(
                                          color: Colors.white,
                                          fontWeight: FontWeight.bold),
                                    ),
                                    onPressed: () { // when we press this button excute login function
                                      _login();
                                     
                                    }),
                              ),
                            )),
                        SizedBox(
                          height: 50,
                        ),
                      ],
                    ),
                  ),
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}
