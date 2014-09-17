def non_duplicated_values(values)
  values.find_all { |x| values.count(x) == 1 }
end