/* the ListTile that we will show every Feedback information in */

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:schools_management/animation/FadeAnimation.dart';

class FeedbackTile extends StatelessWidget {
  final String subject;
  final String teacherName;
  final String feedback;
  final String dateOfFeedback;
  FeedbackTile(
      {this.subject="", this.feedback="", this.teacherName="", this.dateOfFeedback=""});

  @override
  Widget build(BuildContext context) {
   

    return Column(
      children: <Widget>[
       

               ListTile(
            leading: Icon(
              Icons.warning,
              color: Colors.red,
            ),
            title: Text(subject),
            subtitle: Text(dateOfFeedback),
                      onTap:(){
                  showDialog(
                    context: context,
                    builder: (BuildContext context) {
                      return FadeAnimation(1.5,
                                              AlertDialog(
                          title: Center(child: Text(subject)),
                          shape: RoundedRectangleBorder(borderRadius:BorderRadius.circular(10)),
                        content:Container(
                          height: MediaQuery.of(context).size.height*0.2,
                          child: SingleChildScrollView(
                                                  child: Column(children: <Widget>[
                                  Center(child: Text('feedback : $feedback', style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 20
                                        ),
                                      ),)),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                                  Center(child: Text('teacher : $teacherName',style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15
                                        ),
                                      ))),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                                  Center(child: Text(dateOfFeedback,style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15
                                        ),)
                                      )),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                            ],
                            ),
                          ),
                        )),
                      );
                    });
          } ,
            
          ),
      

        Divider(thickness: 1.5,)
      ],
    );
  }
}
