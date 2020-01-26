import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:schools_management/provider/parent.dart';
import 'package:schools_management/provider/student.dart';
import 'package:schools_management/provider/teacher.dart';

import 'package:schools_management/screens/login_page.dart';
import 'package:schools_management/screens/parent/main_parent_page.dart';
import 'package:schools_management/screens/teacher/main_teacher_page.dart';


void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MultiProvider( // The providers that we are gonna use at the app
      providers: [
        ChangeNotifierProvider(
          create: (context) => Parent(),   // parentProvier
        ),

           ChangeNotifierProvider(
          create: (context) => Student(),  // studentparentProvier
        ),

              ChangeNotifierProvider(
          create: (context) => Teacher(),  // teacherProvier
        ),
      ],
      child: MaterialApp(
        title: 'App Name',
        debugShowCheckedModeBanner: false,
        theme: ThemeData(
          primarySwatch: Colors.lightBlue,
          accentColor: Colors.transparent,
        ),
        home: Login(), // homepage
        routes: { // route names to mainParentPage and mainTeacherPage
          MainParentPage.routeName: (ctx) => MainParentPage(),
          MainTeacherPage.routeName: (ctx) => MainTeacherPage(),
  
        },
      ),
    );
  }
}
