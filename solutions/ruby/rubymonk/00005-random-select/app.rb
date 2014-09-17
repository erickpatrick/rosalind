def random_select(array, n)
  result = []
  n.times do
    result << array[rand(array.length)]
  end
  result
end