import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:schools_management/animation/FadeAnimation.dart';
import 'package:schools_management/helper/get_helper.dart';

import 'package:schools_management/widgets/parent/task_tile.dart';

class Tasks extends StatefulWidget {
  final String groupId;

  Tasks({this.groupId});

  @override
  _TasksState createState() => _TasksState();
}

class _TasksState extends State<Tasks> {
  var groups;

  @override
  void initState() {
    groups = GetHelper.getData(widget.groupId, 'get_student_tasks',
        'group_id'); // get the data using this function from GetHelper class we pass
    //the group id and name of php file that we use to get data then kind of input for data
    // if you do not understand go and have look at GetHelper class
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
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
                    height: 20,
                  ),
                  Center(
                      child: FadeAnimation(
                          1.3,
                          Text(
                            "Tasks",
                            style: GoogleFonts.antic(
                              textStyle: TextStyle(
                                  color: Colors.white,
                                  fontWeight: FontWeight.bold),
                              fontSize: 40,
                            ),
                          ))),
                ],
              ),
            ),
            Expanded(
              child: Container(
                  width: double.infinity,
                  decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius:
                          BorderRadius.only(topRight: Radius.circular(100))),
                  padding: EdgeInsets.all(20),

                  // we will use future builder to show the data in a list view
                  // we put the future variable
                  // check if there is no show a message to user no data
                  // else show a list view with tiles that show our data
                  child: FutureBuilder(
                    future: groups,
                    builder: (context, snapshots) {
                      if (!snapshots.hasData || snapshots.data.length == 0) {
                        return Center(
                            child: Text('No Tasks Right now',
                                style: GoogleFonts.antic(
                                    fontWeight: FontWeight.bold,
                                    fontSize: 30)));
                      }
                      return ListView.builder(
                        itemCount: snapshots.data.length,
                        itemBuilder: (context, index) {
                          return TaskTile(
                              subject: snapshots.data[index]['subject'],
                              task: snapshots.data[index]['task'],
                              dateOfTask: snapshots.data[index]
                                  ['date_of_task']);
                        },
                      );
                    },
                  )),
            ),
          ],
        ),
      ),
    );
  }
}
