/* the ListTile that we will show every Time Table information in */

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:schools_management/animation/FadeAnimation.dart';

class TableTile extends StatelessWidget {
  final String appoint1;
  final String appoint2;
  final String appoint3;
  final String appoint4;
  final String appoint5;
  final String appoint6;
  final String appoint7;
  final String appoint8;

  TableTile({
    this.appoint1 = "",
    this.appoint2 = "",
    this.appoint3 = "",
    this.appoint4 = "",
    this.appoint5 = "",
    this.appoint6 = "",
    this.appoint7 = "",
    this.appoint8 = "",
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      children: <Widget>[
        ListTile(
          leading: Icon(
            Icons.school,
          ),
          title: Text('Time Table'),
          onTap: () {
            showDialog(
                context: context,
                builder: (BuildContext context) {
                  return FadeAnimation(
                    1.5,
                    AlertDialog(
                        title: Center(child: Text('Time Table')),
                        shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(10)),
                        content: Container(
                          height: MediaQuery.of(context).size.height * 0.2,
                          child: SingleChildScrollView(
                            child: Column(
                              children: <Widget>[
                                SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text(
                                  '1 : $appoint1',
                                  style: GoogleFonts.antic(
                                    textStyle: TextStyle(
                                        color: Colors.black,
                                        fontWeight: FontWeight.bold,
                                        fontSize: 20),
                                  ),
                                )),
                                Divider(
                                  thickness: 1.5,
                                ),
                                SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text('2 : $appoint2',
                                        style: GoogleFonts.antic(
                                          textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 15),
                                        ))),
                                Divider(
                                  thickness: 1.5,
                                ),

                                     SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text('3 : $appoint3',
                                        style: GoogleFonts.antic(
                                          textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 15),
                                        ))),
                                Divider(
                                  thickness: 1.5,
                                ),
                                     SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text('4 : $appoint4',
                                        style: GoogleFonts.antic(
                                          textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 15),
                                        ))),
                                Divider(
                                  thickness: 1.5,
                                ),
                                     SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text('5 : $appoint5',
                                        style: GoogleFonts.antic(
                                          textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 15),
                                        ))),
                                Divider(
                                  thickness: 1.5,
                                ),
                                     SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text('6 : $appoint6',
                                        style: GoogleFonts.antic(
                                          textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 15),
                                        ))),
                                Divider(
                                  thickness: 1.5,
                                ),
                                     SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text('7 : $appoint7',
                                        style: GoogleFonts.antic(
                                          textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 15),
                                        ))),
                                Divider(
                                  thickness: 1.5,
                                ),
                                     SizedBox(
                                  height: 10,
                                ),
                                Center(
                                    child: Text('8 : $appoint8',
                                        style: GoogleFonts.antic(
                                          textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 15),
                                        ))),
                                Divider(
                                  thickness: 1.5,
                                ),
                              ],
                            ),
                          ),
                        )),
                  );
                });
          },
        ),
        Divider(
          thickness: 1.5,
        )
      ],
    );
  }
}
