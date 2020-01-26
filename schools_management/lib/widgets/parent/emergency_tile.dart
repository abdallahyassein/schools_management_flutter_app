/* the ListTile that we will show every Emergency information in */

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:schools_management/animation/FadeAnimation.dart';

class EmergencyTile extends StatelessWidget {
  final String relation;
  final String name;
  final String address;
  final String number;
  final String email;
  EmergencyTile(
      {this.relation="", this.address="", this.name="", this.number="",this.email=""});

  @override
  Widget build(BuildContext context) {
   

    return Column(
      children: <Widget>[
       

               ListTile(
            leading: Icon(
              Icons.warning,
              color: Colors.red,
            ),
            title: Text(relation),
            subtitle: Text(number),
                      onTap:(){
                  showDialog(
                    context: context,
                    builder: (BuildContext context) {
                      return FadeAnimation(1.5,
                                              AlertDialog(
                          title: Center(child: Text(relation)),
                          shape: RoundedRectangleBorder(borderRadius:BorderRadius.circular(10)),
                        content:Container(
                          height: MediaQuery.of(context).size.height*0.2,
                          child: SingleChildScrollView(
                                                  child: Column(children: <Widget>[
                                  Center(child: Text('address : $address', style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 20
                                        ),
                                      ),)),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                                  Center(child: Text('Name : $name',style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15
                                        ),
                                      ))),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                                  Center(child: Text('Number : $number',style: GoogleFonts.antic(
                                        textStyle: TextStyle(
                                          color: Colors.black,
                                          fontWeight: FontWeight.bold,
                                          fontSize: 15
                                        ),)
                                      )),
                                      Divider(thickness: 1.5,),
                                  SizedBox(height: 10,),
                                     Center(child: Text(email,style: GoogleFonts.antic(
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
