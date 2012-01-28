# Rach5

### Contents
*   What is it?
*   Why should I care?
*   What do I need?
*   TODO
*   License (Modified 3-Clause BSD)

### What is Rach5?
**Rach5** (that's _Rach_ as in _Rach_-maninov) is a WordPress theme boilerplate developed by Chris Van Patten for Van Patten Media.

### Why should I care?
Frankly, you probably shouldn't. It seemed like a nice, non-offensive way to kick off our GitHub page though.

### What do I need?
**Rach5** requires the following Ruby gems...

*   <a href="http://compass-style.org/">Compass</a>
*   <a href="http://rubygems.org/gems/net-ssh">Net-SSH</a>
*   <a href="http://rubygems.org/gems/net-sftp">Net-SFTP</a>
*   <a href="https://github.com/aaronrussell/compass-rgbapng">rgbapng</a>

And of course you need WordPress, as this is all pretty useless without it.

### Getting started
It's easy! Follow along:

1.  Install Ruby and RubyGems
2.  Install the required gems (see above for a list)
3.  Edit the following files so your Rach5 setup reflects you:
    *   humans.txt
    *   config.rb
    *   style.css
4.  Install WordPress and set up a permalink structure (we don't do it for you)
5.  Upload Rach5
    *   A word of warning: **do _not_ under _any circumstances_ upload config.rb** – your password is in there!
6.  Activate Rach5
7.  Enjoy Rach5!

### TODO
*   Comments, as they stand now, don't exist in public/are a mess in private.
    *   I have problems with including presentational functions in functions.php, which is how it's currently done in WordPress. There have to be ways to navigate around that...
*   I need to rethink SASS organization. /includes, /structure, and /pages are a good start but could be more flexible
*   Moar HTML5!
*   Logo!

### DONE
*   I borrowed lots (and modified it all) from Roots, a great WordPress theme framework. I like Roots a lot, but it's not suited for my purposes... I need something lighter, that makes fewer assumptions on what settings I need, which is why I am developing Rach5. Still, it has a lot of great features, and I've incorporated a small chunk into Rach5.
*   <del>I have a bunch of fancy functions I reference in functions.php that I need to reinclude</del>
    *   They're back and they're awesome.
*   <del>As of now I don't include any responsive components, because I don't want to get involved in endorsing any CSS frameworks or anything. I think I could avoid that by writing some basic media queries and throwing them in a SASS file, which is what I often do anyway.</del>
    *   I'm not explicitly including any full frameworks, but I have decided to include the responsive media queries from <a href="http://getskeleton.com/">Skeleton</a>. Skeleton is licensed under the <a href="http://www.opensource.org/licenses/mit-license.php">MIT license</a>.
*   <del>There are some new Ruby gem requirements that need to be noted</del>
    *   rgbapng is now noted prominently. Things will probably break if you are without it.

### License
**Copyright (C) 2011, Chris Van Patten.**
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

*   Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
*   Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
*   Neither the name of the organization nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.