#! /usr/bin/perl

@file = <>;
while (@file) {
    $line = shift @file;
    $line =~ s/\t//g;
    $line =~ s/\cK/\n/g;
    if ($line =~ s/^##### (\S+) #####//) {
	open OUTFILE, ">$1";
	print OUTFILE $line;
	close OUTFILE;
    } else {
	print STDERR "Unknown line in file: $line\n";
    }
}
