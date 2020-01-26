import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:schools_management/animation/FadeAnimation.dart';
import 'package:schools_management/helper/get_helper.dart';

class ComplantPage extends StatefulWidget {
  final String schoolId;

  ComplantPage({this.schoolId});

  @override
  _ComplantPageState createState() => _ComplantPageState();
}

class _ComplantPageState extends State<ComplantPage> {
  GlobalKey<FormState> _formKey = GlobalKey<FormState>(); // key for form
  
  TextEditingController typeControl = new TextEditingController(); // input controller from users
  TextEditingController nameControl = new TextEditingController(); // input controller from users
  TextEditingController numberControl = new TextEditingController(); // input controller from users
  TextEditingController titleControl = new TextEditingController(); // input controller from users
  TextEditingController feedbackControl = new TextEditingController(); // input controller from users

  @override
  void initState() {
    super.initState();
    print(widget.schoolId);
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
            child:
                Column(crossAxisAlignment: CrossAxisAlignment.start, children: <
                    Widget>[
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
                              "Complaint",
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
                      decoration: BoxDecoration(
                          color: Colors.white,
                          borderRadius: BorderRadius.only(
                              topLeft: Radius.circular(60),
                              topRight: Radius.circular(60))),
                      child: Padding(
                          padding: EdgeInsets.all(30),
                          child: SingleChildScrollView(
                              child: Column(children: <Widget>[
                            SizedBox(
                              height: 60,
                            ),
                            FadeAnimation(
                              1.4,
                              Container(
                                decoration: BoxDecoration(
                                    color: Colors.white,
                                    borderRadius: BorderRadius.circular(10),
                                    boxShadow: [
                                      BoxShadow(
                                          color:
                                              Color.fromRGBO(225, 95, 27, .3),
                                          blurRadius: 20,
                                          offset: Offset(0, 10))
                                    ]),
                                child: Form(
                                  key: _formKey,
                                  child: Column(children: <Widget>[
                                    Container(
                                      width: double.infinity,
                                      padding: EdgeInsets.all(10),
                                      decoration: BoxDecoration(
                                          color: Colors.white,
                                          border: Border(
                                              bottom: BorderSide(
                                                  color: Colors.grey[200]))),
                                      child: TextFormField(
                                        controller: typeControl,
                                        decoration: InputDecoration(
                                            hintText: "Relation",
                                            hintStyle:
                                                TextStyle(color: Colors.grey),
                                            border: InputBorder.none),
                                      ),
                                    ),
                                    Container(
                                      width: double.infinity,
                                      padding: EdgeInsets.all(10),
                                      decoration: BoxDecoration(
                                          border: Border(
                                              bottom: BorderSide(
                                                  color: Colors.grey[200]))),
                                      child: TextFormField(
                                        controller: nameControl,
                                        decoration: InputDecoration(
                                            hintText: "Write Your Name Please",
                                            hintStyle:
                                                TextStyle(color: Colors.grey),
                                            border: InputBorder.none),
                                      ),
                                    ),
                                    Container(
                                      width: double.infinity,
                                      padding: EdgeInsets.all(10),
                                      decoration: BoxDecoration(
                                          border: Border(
                                              bottom: BorderSide(
                                                  color: Colors.grey[200]))),
                                      child: TextFormField(
                                        controller: numberControl,
                                        decoration: InputDecoration(
                                            hintText:
                                                "Write Your Number Please",
                                            hintStyle:
                                                TextStyle(color: Colors.grey),
                                            border: InputBorder.none),
                                      ),
                                    ),
                                    Container(
                                      width: double.infinity,
                                      padding: EdgeInsets.all(10),
                                      decoration: BoxDecoration(
                                          border: Border(
                                              bottom: BorderSide(
                                                  color: Colors.grey[200]))),
                                      child: TextFormField(
                                        controller: titleControl,
                                        decoration: InputDecoration(
                                            hintText:
                                                "Write Title Of Complaints",
                                            hintStyle:
                                                TextStyle(color: Colors.grey),
                                            border: InputBorder.none),
                                      ),
                                    ),
                                    Container(
                                      width: double.infinity,
                                      height: 100,
                                      padding: EdgeInsets.all(10),
                                      decoration: BoxDecoration(
                                          border: Border(
                                              bottom: BorderSide(
                                                  color: Colors.grey[200]))),
                                      child: TextFormField(
                                        controller: feedbackControl,
                                        decoration: InputDecoration(
                                            hintText:
                                                "Write Your Complaint Here Please",
                                            hintStyle:
                                                TextStyle(color: Colors.grey),
                                            border: InputBorder.none),
                                        validator: (value) {
                                          if (value.length < 20) {
                                            return '$value length not long enough';
                                          } else {
                                            return null;
                                          }
                                        },
                                      ),
                                    ),
                                    SizedBox(
                                      height: 40,
                                    ),
                                    FadeAnimation(
                                        1.6,
                                        Container(
                                          height: 50,
                                          margin: EdgeInsets.symmetric(
                                              horizontal: 50),
                                          decoration: BoxDecoration(
                                              borderRadius:
                                                  BorderRadius.circular(50),
                                              color: Color.fromRGBO(
                                                  154, 233, 178, 1)),
                                          child: Center(
                                            child: FlatButton(
                                                child: Text(
                                                  "Send Complaint",
                                                  style: TextStyle(
                                                      color: Colors.white,
                                                      fontWeight:
                                                          FontWeight.bold),
                                                ),
                                                onPressed: () { // when user press this button send complant using GetHelper
                                                // if you do not understant go to GetHelper
                                                  GetHelper.sendComplant( 
                                                      _formKey,
                                                      context,
                                                      typeControl.text,
                                                      nameControl.text,
                                                      numberControl.text,
                                                      titleControl.text,
                                                      feedbackControl.text,
                                                      widget.schoolId);
                                                }),
                                          ),
                                        )),
                                    SizedBox(
                                      height: 50,
                                    ),
                                  ]),
                                ),
                              ),
                            ),
                          ])))))
            ])));
  }
}
