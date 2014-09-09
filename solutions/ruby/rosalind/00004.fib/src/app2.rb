input = "5 3"

n, k = input.split
raise "'n' is bigger than the acceptable maximus" if n.to_i > 40
raise "'k' is bigger than the acceptable maximus" if k.to_i > 5

months = [1,1]
(2..n.to_i).each do |i|
  months[i] = months[i - 1] + (months[i - 2] * 3)
end

puts months[n.to_i - 1]