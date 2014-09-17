def kaprekar?(k)
  sq = (k ** 2).to_s
  dec = sq.length / 2 - 1
  max = sq.length - 1

  k == sq[0..dec].to_i + sq[dec + 1..max].to_i
end


puts kaprekar? 9
puts kaprekar? 46
puts kaprekar? 55
puts kaprekar? 90
puts kaprekar? 297
puts kaprekar? 703
