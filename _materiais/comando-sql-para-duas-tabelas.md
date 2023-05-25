# Comando SQL para consulta de dados de 2 tabelas (JOIN)

SELECT 
	noticias.id, 
	noticias.titulo, 
	noticias.data,
	usuarios.nome
FROM noticias INNER JOIN usuarios
ON noticias.usuario_id = usuarios.id
ORDER BY data DESC

