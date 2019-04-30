import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Attendance';
  people = ['Blake Browning', 'Jack Smith', 'John Doe'];
  events = ['Basketball', 'Crawfish Broil', 'Cane\'s Chicken', 'Bowling', 'Cookout at 1508', 'Golf', 'Benny\'s Pizza'];
 
}