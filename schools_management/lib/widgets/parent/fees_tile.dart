/* the ListTile that we will show every fee information in */

import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';


class FeesTile extends StatelessWidget {
  final String amount;
  final String date;

  FeesTile(
      {this.amount="", this.date="", });

  @override
  Widget build(BuildContext context) {
   

    return Column(
      children: <Widget>[
       
        
               ListTile(
            leading: Icon(
              Icons.attach_money,
              color: Colors.green,
            ),
        
           
                title: Text(amount,style: GoogleFonts.antic(fontWeight:FontWeight.bold,fontSize: 20),),
            subtitle: Text(date),
          ),
      
        
        Divider(thickness: 1.5,)
      ],
    );
  }
}
