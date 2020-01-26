/* the ListTile that we will show every medication information in */

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:schools_management/animation/FadeAnimation.dart';

class MedicationTile extends StatelessWidget {
  final String name;
  final String time;
  final String description;
  final String dateofRegister;
  MedicationTile(
      {this.name="", this.description="", this.time="", this.dateofRegister=""});

  @override
  Widget build(BuildContext context) {
   

    return Column(
      children: <Widget>[
       

               ListTile(
            leading: Icon(
              Icons.warning,
              color: Colors.red,
            ),
            title: Text(name),
            subtitle: Text(dateofRegister),
                      onTap:(){
                  showDialog(
                    context: context,
                    builder: (BuildContext context) {
                      return FadeAnimation(1.5,
                                              AlertDialog(
                          title: Center(child: Text(name)),
                          shape: RoundedRectangleBorder(borderRadius:BorderRadius.circular(10)),
                        content:Container(
                          height: MediaQuery.of(context).size.height*0.2,
                          child: SingleChildScrollView(
                                                  child: Column(children: <Widget>[
                                  Center(child: Text('description : $description', style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 20
                                        ),
                                      ),)),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                                  Center(child: Text('time : $time',style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15
                                        ),
                                      ))),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                                  Center(child: Text(dateofRegister,style: GoogleFonts.antic(
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
