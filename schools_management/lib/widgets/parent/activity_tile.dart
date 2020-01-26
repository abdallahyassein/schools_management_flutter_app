/* the ListTile that we will show every Activity information in */

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class ActivityTile extends StatelessWidget {
  final String name;
  final String explanation;

  ActivityTile(
      {this.name="", this.explanation="", });

  @override
  Widget build(BuildContext context) {
   

    return Column(
      children: <Widget>[
       
    
                  ListTile(
            leading: Icon(
              Icons.filter_b_and_w,
              
            ),
        
           
                title: Text(name),
            subtitle: Text(explanation),
                  onTap:(){
                  showDialog(
                    context: context,
                    builder: (BuildContext context) {
                      return AlertDialog(
                        title: Center(child: Text(name)),
                        shape: RoundedRectangleBorder(borderRadius:BorderRadius.circular(10)),
                      content: 
               
                            Container(
                                height: MediaQuery.of(context).size.height*0.1,
                                child: SingleChildScrollView(
                                                                  child: Column(
                                    children: <Widget>[
                                      Center(child: Text(explanation, style: GoogleFonts.antic(
                                            textStyle: TextStyle(
                                              color: Colors.black,
                                              fontWeight: FontWeight.bold,
                                              fontSize: 20
                                            ),
                                          ),)),
                                    ],
                                  ),
                                ),
                              ),
                        
            
                            
                          
                     
                      );
                    });
          } ,
          ),
       
        
        Divider(thickness: 1.5,)
      ],
    );
  }
}
