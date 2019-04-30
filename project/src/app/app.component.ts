import { Component } from '@angular/core';
import { Attendee } from './attendee';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

//Trevor Bedsaul, Andrew Kepley
//tdb7mw, ak2hr

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Event Check-In';


  // let's create a property to store a response from the back end
  // and try binding it back to the view
  responsedata = new Object;

  people = ['Blake Browning', 'Jack Smith', 'John Doe'];
  events = ['Basketball', 'Crawfish Broil', 'Canes Chicken', 'Bowling', 'Cookout at 1508', 'Golf', 'Bennys Pizza'];
  attendeeModel = new Attendee('', '', '', true);
  checkedin = '';

  constructor(private http: HttpClient) { }

  senddata(data) {
     console.log(data);

     let params = JSON.stringify(data);

     //this.http.get('http://localhost/cs4640s19/ngphp-get.php?str='+encodeURIComponent(params))
     this.http.get('http://localhost/project/project/ngphp-get.php?str=' + params)
     //this.http.post('http://localhost/cs4640s19/ngphp-post.php', data)
     .subscribe((data) => {
        console.log('Got data from backend', data);
        this.responsedata = data;
     }, (error) => {
        console.log('Error', error);
     })
  }

  checkIn() {
    this.checkedin = 'You have successfully checked in!';
 }
}