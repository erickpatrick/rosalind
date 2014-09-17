def array_of_fixnums?(array)
  array.all? { |x| x.is_a? Fixnum }
end