t = "AAAACCCGGT"
raise "There are more than 1000bp" if t.length / 2 > 1000
puts t.reverse!.tr! "ATGC", "TACG"