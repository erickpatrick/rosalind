dna_strings = '>Rosalind_6404 CCTGCGGAAGATCGGCACTAGAATAGCCAGAACCGTTTCTCTGAGGCTTCCGGCCTTCCCTCCCACTAATAATTCTGAGG>Rosalind_5959 CCATCGGTAGCGCATCCTTAGTCCAATTAAGTCCCTATCCAGGCGCTCCGCCGAAGGTCTATATCCATTTGTCAGCAGACACGC>Rosalind_0808 CCACCCTCGTGGTATGGCTAGGCATTCAGGAACCGGAGAACGCTTCAGACCAGCCCGGACTGGGAACCTGCGGGCAGTAGGTGGAAT'

dna_strings = dna_strings.split(">")
dna_strings.shift

Process.exit! "# of DNA Strings too big" unless dna_strings.length <= 10

dna_strings.map! do |k|
  k = k.split(" ").map {|s| s.strip}
end

dna_strings.map! do |k,v|
  Process.exit! "#{k} ID doesn't follow FASTA format" unless k.split('_')[0].to_i.between? 0000, 9999
  Process.exit! "#{k} bigger than 1kbp" unless v.length % 2 < 1000
  length = v.count "GC"
  length = length / v.length.to_f * 100

  [k, length.to_f]
end

dna_strings.sort! {|k,v| k <=> v}
puts dna_strings[0]