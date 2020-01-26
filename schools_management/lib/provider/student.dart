/**the provider for student */

import 'dart:convert';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;



//StudentClass
class StudentInf  {

  final String id;
  final String schoolID;
  final String name;
  final String grade;
  final String address;
  final String dateOfBirth;
  final String dateOfRegister;

  StudentInf({this.id,this.schoolID,this.name,this.grade,this.address,this.dateOfBirth,this.dateOfRegister});

}

// the class for the provider
class Student with ChangeNotifier{

  StudentInf _inf; // we will put the data that we will get at this variable

    // we will get the _inf variable by calling this function
    StudentInf getStudentInf(){

      return _inf;
  }


  // we will insert the data using this function
  void setStudentInf(StudentInf inf){

      _inf=inf;
      print(_inf);
      notifyListeners();

  }

 //we will use this function to get student information by pathing the id
   Future<bool> getInfWithID(String id) async{
    var response;
    var datauser;
    try{
        response = await http.post(
              "http://10.0.2.2/institutions/for_app/get_data/get_student_data.php",
              body: {
                "id": id,  // we will path here student id       
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

       StudentInf studentInf = StudentInf(
          id: datauser[0]['id'],
          schoolID: datauser[0]['school_id'],
          name: datauser[0]['name'],
          address: datauser[0]['address'],
          grade: datauser[0]['grade'],
          dateOfBirth: datauser[0]['date_of_birth'],
          dateOfRegister: datauser[0]['date_of_register']);
          setStudentInf(studentInf);
  }


    logOut(){
    _inf=new StudentInf(); // we will empty the _inf variable cause the user logged out
    notifyListeners();
    print(_inf.id);
  }

  

}