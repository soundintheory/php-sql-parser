PHP SQL Parser
--------------

A fork of https://code.google.com/p/php-sql-parser/

A Parser for mysql-ish queries that can represent a query as an array.

# Goals:
	1. A PSR-0 Compatible implementation
	2. Improvements
	3. Profit!!!

## Usage

### Use your PSR-0 Compatible Autoloader or the sample one provided in example.php


## Improvements/Feedback.

Please send them to me, or send a pull request. I will honor every reasonable request, where reasonable usually means elegance, simplicity and bug fixes. Suggestions for improvement are welcome, though you'll see them sooner if you write them.
I will take unit tests as well!

## License

PHPSQLParser is licensed under The BSD 2-Clause License, available online here: http://opensource.org/licenses/bsd-license.php

/**
 * A pure PHP SQL (non validating) parser w/ focus on MySQL dialect of SQL
 *
 * Copyright (c) 2010-2012, Justin Swanhart
 * with contributions by André Rothe <arothe@phosco.info, phosco@gmx.de>
 * with contributions by Dan Vande More <bigdan@gmail.com>
 *
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *   * Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *   * Redistributions in binary form must reproduce the above copyright notice,
 *     this list of conditions and the following disclaimer in the documentation
 *     and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR
 * BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 */