input = "5 3"

n, k = input.split
raise "'n' is bigger than the acceptable maximus" if n.to_i > 40
raise "'k' is bigger than the acceptable maximus" if k.to_i > 5

total = []

(1..n.to_i).each do |n|
  if n == 1 or n == 2
    total[n] = 1
    next
  end
  total[n] = total[n-1] + (total[n-2]*3)
end

puts total[n.to_i]