/* the ListTile that we will show every Group information for Teacher */

import 'package:flutter/material.dart';

class GroupTeacherTile extends StatelessWidget {

  final String name;
  final String subject;
  final String time;
  final Function function;


  GroupTeacherTile(
      {this.name="", this.subject="",this.time="",this.function});

  @override
  Widget build(BuildContext context) {
   

    return Column(
      children: <Widget>[
       

               ListTile(
            leading: Icon(
              Icons.school,
            
            ),
            title: Text(name),
            subtitle: Text(time),
            trailing: FlatButton(
              child: Text('Add Task',style:TextStyle(color: Colors.white),),
              color: Color.fromRGBO(148, 229, 145 , 1),
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
              onPressed: function ,
            ) ,
            onTap:function
            
          ),
      

        Divider(thickness: 1.5,)
      ],
    );
  }
}
