<?php

/*
 * Create three custom taxonomies (no) custom taxonomy types (apart from hierarchial & non-hierarchial) to define relationships at application level
 * equivalent
 *	(use_for) the terms can be used for each other. The *each other* is an abstract term.
 *	all terms (posts) are equal to this abstract term
 * associated
 *	(related_to) the terms are related to each other. The *each other* is an abstract term.
 *	all terms (posts) are related to this abstract term
 * opposite 
 *	(use_against) the terms or term groups are opposite of each other. The *each_other* is an abstract term
 * 
 * the degree of equivalence is defined using hierarchy or parent column
 * 
 * define hierarchial or degree using existing parent column between
 *  * equivalent & associated terms
 *  * equivalent & equivalent terms
 *  * associated & associated terms
 * 
 * equivalent & associated terms will have dual behaviour of being
 *  1. terms (used to define relationships between content)
 *  2. term groups (used to define relationships between terms, as well as term groups)
 *  
 * 4 related posts
 * The relationship between these posts can be defined by defining
 * 
 * For eg. in an MCQ,
 * Q. Which of the following numbers is a multiple of both 2 & 3?
 * a. 6
 * b. 9
 * c. 18
 * d. 5
 * 
 * Both a & c are correct answers & b & d are incorrect
 * So, in this case, a & c are equivalent as are b & d
 * create one abstract term for correct answers and assign it to both a & c (say id, 31 of equivalent taxonomy)
 * another abstract term for incorrect answers & assign it to b & d (say id, 32 of equivalent taxonomy)
 * another abstract term (id 33, of opposite taxonomy) and add that to term_group of both 31 & 32
 * 
 * Eg 2
 * Q. Who is Amitabh Bacchan?
 * a. an actor
 * b. a bollywood actor
 * c. an accomplished actor in the Hindi film industry
 * d. none of my business
 * 
 * a, b & c, all are correct
 * but c is *more* correct than a & b
 * create one abstract term for a & b for equivalent (33)
 * create one abstract term for c for equivalent (34)
 * one abstract term for correct answers (35)
 * one abstract term for incorrect answers (36)
 * one abstract term (37) to show opposition between 35 & 36
 * 33 & 34 will have 35 in their term_group
 * 34 will be parent of 33
 * 
 * terms that don't belong to any term_group of our app are regular terms
 * posts not tagged with our taxonomy terms don't have relationships with other posts
 * the moment you define relationships between posts or terms, our custom taxonomy terms are created & assigned
 */