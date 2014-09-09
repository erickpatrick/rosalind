dna1 = 'GAGCCTACTAACGGGAT'
dna2 = 'CATCGTAATGACGGCCT'

Process.exit! "dna1 and dn2 lengths don't match" unless dna1.length == dna2.length
Process.exit! "dna strings bigger than 1kbp" unless dna1.length % 2 < 1000

counter = 0
(0..dna2.length).each do |i|
  counter += dna1[i] != dna2[i] ? 1 : 0
end

puts counter