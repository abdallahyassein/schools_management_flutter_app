/**the provider for teacher */

import 'dart:convert';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

//TeacherClass
class TeacherInf  {

  final String id;
  final String schoolID;
  final String name;
  final String subject;
  final String email;
  final String address;
  final String number;
  final String dateOfRegister;

  TeacherInf({this.id,this.schoolID,this.name,this.subject,this.email,this.address,this.number,this.dateOfRegister});

}

// the class for the provider
class Teacher with ChangeNotifier{

  TeacherInf _inf; // we will put the data that we will get at this variable

// we will get the _inf variable by calling this function
    TeacherInf getTeacherInf(){

      return _inf;
  }


    // we will insert the data using this function
  void setTeacherInf(TeacherInf inf){

      _inf=inf;
      print(_inf);
      notifyListeners();

  }

  //we will use this function to login and get parent infromation by passing the username and password to it
  // we use it Future Boolean <so when we use it we check if the user logged properly return true other wise return false>
   Future<bool> loginTeacherAndGetInf(String user,String pass) async{
    var response;
    var datauser;
    try{
        response = await http.post(
              "http://10.0.2.2/institutions/for_app/login_teachers.php",
              body: {
                "username": user.trim(), // we use trim method to avoid spaces that user may make when logging 
                "password": pass.trim(), // we use trim method to avoid spaces that user may make when logging 
              });
    if(response.statusCode == 200){ // if every things are right decode the response and insertInf then return true
    datauser = await json.decode(response.body);
    insertInf(datauser);
    return true;
    }
    print(datauser);
    }catch(e){
      print(e); // else print the error then return false
      
    }

   return false;
    
  }

// i just used this function to make the code more organised and not so messed
  insertInf(dynamic datauser){

       TeacherInf parentInf = TeacherInf(
          id: datauser[0]['id'],
         
          schoolID: datauser[0]['school_id'],
          name: datauser[0]['name'],
          subject: datauser[0]['subject'],
          address: datauser[0]['address'],
          number: datauser[0]['number'],
          email: datauser[0]['email'],
          dateOfRegister: datauser[0]['date_of_register']);
          setTeacherInf(parentInf);

  }

  
    logOut(){
    _inf=new TeacherInf(); // we will empty the _inf variable cause the user logged out
    notifyListeners();
    print(_inf.id);
  }

  
  
  
  

}