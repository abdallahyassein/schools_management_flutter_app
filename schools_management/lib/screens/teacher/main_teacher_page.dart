import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:provider/provider.dart';
import 'package:schools_management/animation/FadeAnimation.dart';
import 'package:schools_management/provider/teacher.dart';
import 'package:schools_management/screens/login_page.dart';
import 'package:schools_management/screens/teacher/classes_page_teacher.dart';



import 'package:schools_management/widgets/card_item.dart';

class MainTeacherPage extends StatefulWidget {
  static const routeName = '/main-teacher-page';

  @override
  _MainTeacherPageState createState() => _MainTeacherPageState();
}

class _MainTeacherPageState extends State<MainTeacherPage> {

    TeacherInf getTeacherInfo;
    
    String teacherId;
    String teacherName;
    String teacherAddress;
    String teacherNumber;
    String teacherSubject;
    String schoolId;



  

  @override
  Widget build(BuildContext context) {

   
    // get teacher data
    getTeacherInfo= Provider.of<Teacher>(context).getTeacherInf();
    
    teacherId = getTeacherInfo.id;
    teacherName = getTeacherInfo.name;
    teacherAddress = getTeacherInfo.address;
    teacherNumber = getTeacherInfo.number;
    teacherSubject=getTeacherInfo.subject;
    schoolId=getTeacherInfo.schoolID;


    return WillPopScope(
      onWillPop: () async => false,
      child: Scaffold(
        body: Container(
          width: double.infinity,
          decoration: BoxDecoration(
              gradient: LinearGradient(begin: Alignment.topCenter, colors: [
            Color.fromRGBO(154, 233, 178, 1),
            Color.fromRGBO(173, 187, 238, 1),
          ])),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              Padding(
                padding: EdgeInsets.all(20),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    SizedBox(
                      height: 50,
                    ),
                    Center(
                        child: FadeAnimation(
                            1.3,
                            Text(
                              "Teacher, $teacherName",
                              style: GoogleFonts.antic(
                                textStyle: TextStyle(
                                    color: Colors.white,
                                    fontWeight: FontWeight.bold),
                                fontSize: 25,
                              ),
                            ))),

                             Center(
                        child: FadeAnimation(
                            1.3,
                            Text(
                              "Subject : $teacherSubject",
                              style: GoogleFonts.antic(
                                textStyle: TextStyle(
                                    color: Colors.white,
                                    fontWeight: FontWeight.bold),
                                fontSize: 25,
                              ),
                            ))),
                    Center(
                        child: FadeAnimation(
                            1.3,
                            Text(
                              "Address : $teacherAddress",
                              style: GoogleFonts.asar(
                                textStyle: TextStyle(
                                    color: Colors.white,
                                    fontWeight: FontWeight.bold),
                                fontSize: 20,
                              ),
                            ))),
                    Center(
                        child: FadeAnimation(
                            1.3,
                            Text(
                              "Phone Number : $teacherNumber",
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
                  width: double.infinity,
                  decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.only(
                          topLeft: Radius.circular(60),
                          topRight: Radius.circular(60))),
                  padding: EdgeInsets.all(20),
                  child: GridView.count(
                    primary: false,
                    padding: const EdgeInsets.all(20.0),
                    crossAxisSpacing: 10,
                    crossAxisCount: 2,
                    children: <Widget>[
                      
                                 CardItem(
                        desc: 'Classes',
                        img: 'assets/images/class-icon.png',
                        color: Color.fromRGBO(120, 99, 101, 1),
                          function: (){   Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => TeacherClasses(teacherId: teacherId,schoolId:schoolId)),
                          );
                        }
                      ),
                
         
               
          
                           CardItem(
                        desc: 'log Out',
                        img: 'assets/images/logout-icon.png',
                        color: Color.fromRGBO(154, 80, 80, 1),
                              function: (){  

                            Provider.of<Teacher>(context).logOut();
                             Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => Login()),
                          );
                        }
                      ),
                    ],
                  ),
                ),
              )
            ],
          ),
        ),
      ),
    );
  }
}
