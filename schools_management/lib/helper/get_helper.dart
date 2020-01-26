/** we use this class to GetHelper to prevent from repeat writing the same function on other servral classes 
 * and make the code more organised
 * like activities,classes,complant,... and more others 
 *  we will get the data using http package
  **/

import 'dart:convert';
import 'package:google_fonts/google_fonts.dart';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:schools_management/screens/parent/main_parent_page.dart';
import 'package:schools_management/screens/teacher/main_teacher_page.dart';

class GetHelper {


//we will put the dataId(Like studentId or grade) 
//typeOfData(this is the php file that we writing in mysql code to get the data)
// inputData(this will be the type of data that we will get for example if we want to get student activities the input data will be student_id )

  static Future getData(
      String dataId, String typeOfData, String inputData) async {
    try {
      final response = await http.post(
          "http://10.0.2.2/institutions/for_app/get_data/$typeOfData.php",
          body: {
            "$inputData": dataId,
          });
      if (response.statusCode == 200) { // if every things are right 
        var userData = await json.decode(response.body);
        print(userData);
        return userData;
      }
    } catch (e) {
      print(e);
    }
  }


//formKey will be the key for the form that you are gonna path the data through
//context is the context that you are gonna use in show Dialog
// all 6 parameters comming are the data that you are gonna path to the php file to insert the task at your data base (if you do not understand run the app a go to send complant page)

  static Future sendComplant(
      GlobalKey<FormState> formKey,
      BuildContext context,
      String type,
      String name,
      String number,
      String title,
      String feedback,
      String schoolId) async {
    if (formKey.currentState.validate()) {
      try {
        // if you do not understand these data go to (insert_complant.php)
        var data = {
          'school_id': schoolId,
          'type': type,
          'name': name,
          'number': number,
          'title': title,
          'feedback': feedback
        };
        var response = await http.post(
          "http://10.0.2.2/institutions/for_app/insert_data/insert_complant.php",
          body: json.encode(data),
        );
        if (response.statusCode == 200) { // if every things are right then return true
          var message = jsonDecode(response.body);
          print(message);

          showDialog(
              barrierDismissible: false,
              context: context,
              builder: (BuildContext context) {
                return AlertDialog(
                  title: Center(child: Text('Thanks')),
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10)),
                  content: Container(
                    height: MediaQuery.of(context).size.height * 0.1,
                    child: SingleChildScrollView(
                      child: Column(
                        children: <Widget>[
                          Center(
                              child: Text(
                            message,
                            style: GoogleFonts.antic(
                              textStyle: TextStyle(
                                  color: Colors.black,
                                  fontWeight: FontWeight.bold,
                                  fontSize: 20),
                            ),
                          )),
                          Center(
                            child: FlatButton(
                              child: Text("Ok"),
                              color: Colors.blueAccent,
                              onPressed: () {
                                Navigator.of(context)
                                    .pushNamed(MainParentPage.routeName);
                              },
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                );
              });
        }
      } catch (e) {
        print(e);
      }
    }
  }

// like what we made at the pervious function 
  static Future sendTask(GlobalKey<FormState> formKey, BuildContext context,
      String schoolId, String groupId, String subject, String task) async {
    if (formKey.currentState.validate()) {
      try {
        // if you do not understand these data go to (insert_task.php)
        var data = {
          'school_id': schoolId,
          'group_id': groupId,
          'subject': subject,
          'task': task,
        };
        var response = await http.post(
          "http://10.0.2.2/institutions/for_app/insert_data/insert_task.php",
          body: json.encode(data),
        );
        if (response.statusCode == 200) { // if every things are right then return true
          var message = jsonDecode(response.body);
          print(message);

          showDialog(
              barrierDismissible: false,
              context: context,
              builder: (BuildContext context) {
                return AlertDialog(
                  title: Center(child: Text('Thanks')),
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10)),
                  content: Container(
                    height: MediaQuery.of(context).size.height * 0.1,
                    child: SingleChildScrollView(
                      child: Column(
                        children: <Widget>[
                          Center(
                              child: Text(
                            message,
                            style: GoogleFonts.antic(
                              textStyle: TextStyle(
                                  color: Colors.black,
                                  fontWeight: FontWeight.bold,
                                  fontSize: 20),
                            ),
                          )),
                          Center(
                            child: FlatButton(
                              child: Text("Ok"),
                              color: Colors.blueAccent,
                              onPressed: () {
                                Navigator.of(context)
                                    .pushNamed(MainTeacherPage.routeName);
                              },
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                );
              });
        }
      } catch (e) {
        print(e);
      }
    }
  }
}
