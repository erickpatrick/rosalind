t = "GATGGAACTTGACTACGTAAATT"

Process.exist! "DNA string is longer than 1000 nucleotides" if t.length > 1000
puts t.tr! "T", "U"