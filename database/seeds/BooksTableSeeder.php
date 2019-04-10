<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'isbn' => '9780132350884',
            'title' => 'Clean Code: A Handbook of Agile Software Craftsmanship',
            'author' => 'Robert C. Martin',
            'publisher' => 'Prentice Hall',
            'description' => 'Even bad code can function. But if code isn’t clean, it can bring a development organization to its knees. Every year, countless hours and significant resources are lost because of poorly written code. But it doesn’t have to be that way.

            Noted software expert Robert C. Martin presents a revolutionary paradigm with Clean Code: A Handbook of Agile Software Craftsmanship . Martin has teamed up with his colleagues from Object Mentor to distill their best agile practice of cleaning code “on the fly” into a book that will instill within you the values of a software craftsman and make you a better programmer—but only if you work at it.
            
            What kind of work will you be doing? You’ll be reading code—lots of code. And you will be challenged to think about what’s right about that code, and what’s wrong with it. More importantly, you will be challenged to reassess your professional values and your commitment to your craft.
            
            Clean Code is divided into three parts. The first describes the principles, patterns, and practices of writing clean code. The second part consists of several case studies of increasing complexity. Each case study is an exercise in cleaning up code—of transforming a code base that has some problems into one that is sound and efficient. The third part is the payoff: a single chapter containing a list of heuristics and “smells” gathered while creating the case studies. The result is a knowledge base that describes the way we think when we write, read, and clean code.
            
            Readers will come away from this book understanding
            How to tell the difference between good and bad code
            How to write good code and how to transform bad code into good code
            How to create good names, good functions, good objects, and good classes
            How to format code for maximum readability
            How to implement complete error handling without obscuring code logic
            How to unit test and practice test-driven development
            This book is a must for any developer, software engineer, project manager, team lead, or systems analyst with an interest in producing better code.'
        ]);

        DB::table('books')->insert([
            'isbn' => '0131177052',
            'title' => 'Working Effectively with Legacy Code',
            'author' => 'Michael Feathers',
            'publisher' => 'Prentice Hall',
            'description' => 'In this book, Michael Feathers offers start-to-finish strategies for working more effectively with large, untested legacy code bases. This book draws on material Michael created for his own renowned Object Mentor seminars: techniques Michael has used in mentoring to help hundreds of developers, technical managers, and testers bring their legacy systems under control.
            This book also includes a catalog of twenty-four dependency-breaking techniques that help you work with program elements in isolation and make safer changes.'
        ]);
    }
}
