import 'package:flutter/material.dart';

void main() {
  runApp(
    MaterialApp(
      home: QuestionButton()
    )
  );
}

class QuestionButton extends StatefulWidget {
  @override
  QuestionButtonState createState() => QuestionButtonState();
}
class QuestionButtonState extends State<QuestionButton> 
{

  int counter = 0;
  List<String> strings = ['Which element is the most reactive?',  'What is the problem with the following picture? ',  'Inertia is a property of matter '];
  String displayedString =  ' ';
  Container c=new Container();
  Image emp=Image.network('http://www.brooklynvegan.com/files/2016/11/rick-astley.jpg', height: 0, width:0,);
  Image rick=Image.network('http://www.brooklynvegan.com/files/2016/11/rick-astley.jpg',height: 300, width: 300,);
  Image display=Image.network('http://www.brooklynvegan.com/files/2016/11/rick-astley.jpg', height: 0, width:0,);
  EdgeInsets pad=EdgeInsets.all(10);
  Color right=Colors.white;
  Color wrong=Colors.white;
  void settings()
  {
  }
  void showRightAns()
  {
    setState(() {
      if(right==Colors.white)
      {
        right=Colors.green;
        counter=counter-1;
        onPressed();
        right=Colors.white;
      }
      else
        right=Colors.white;
    });
  }
  void onPressed() {
    setState(() {
      if(counter==-1)
      {
        counter=2;
      }
      displayedString = strings[counter];
      if(counter==0)
      {
        display=emp;
        pad=EdgeInsets.all(30);
        c=Container(child:Column(children: <Widget>[
          ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'Oxygen', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: wrong,
                onPressed: showRightAns
              ),),
              
            ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'Carbon', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: wrong,
                onPressed: showRightAns
              ),),
            ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'Fluorine', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: right,
                onPressed: showRightAns
              ),),
          ]));
      }
            if(counter==1)
      {
        display=rick;
        pad=EdgeInsets.all(0);
        c=Container(child: Column(children: <Widget>[
          ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'Nothing, but you picked the top', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: right,
                onPressed: showRightAns
              ),),
              
            ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'Nothing, but you pickey the middle', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: right,
                onPressed: showRightAns
              ),),
            ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'Nothing, but you picked the bottom', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: right,
                onPressed: showRightAns
                ),),
          
          ]));
      }
      if(counter==2)
      {
        display=emp;
        pad=EdgeInsets.all(30);
        c=Container(child: Column(children: <Widget>[
            ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'True', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: right,
                onPressed: showRightAns
              ),),ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'False', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: wrong,
                onPressed: showRightAns
              ),),
          ]));
      }
      counter = counter < 2 ? counter + 1 : 0;
    });
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.pink[200],
      appBar: AppBar(title:  const Text( 'Kwizzard '), backgroundColor: Colors.pink, 
      actions: <Widget>[Icon(Icons.settings)]),
      body: Container(
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              Text(displayedString, style: TextStyle(fontSize: 30.0, fontWeight: FontWeight.bold)),
              Container( child: display),
              Padding(padding: pad),
              Container (child: c),
              Padding(padding: EdgeInsets.all(10)),
              ButtonTheme(
                minWidth: 500,
                child: RaisedButton(
                child:  const Text( 'Next question ', style:  const TextStyle(color: Colors.black, fontSize: 20.0)),
                shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30.0)),
                color: Colors.white,
                onPressed: onPressed
                ))
            ])
        )
      )
    );
  }
}
