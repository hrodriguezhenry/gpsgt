function getToken() {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; session_token=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

export const apiService = {
    async fetchData(url, method, body = {}, responseType) {
        try {
            const token = getToken(); // Llama a la función para obtener el token
            console.log(token)
            const response = await fetch(url, {
                method,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `Bearer ${token}`  // Usa el token obtenido
                },
                body: new URLSearchParams(body),
            });

            if (!response.ok) {
                throw new Error(`Error: ${response.statusText}`);
            }

            // Maneja la respuesta según el tipo solicitado
            if (responseType === 'json') {
                return await response.json();
            } else if (responseType === 'text') {
                return await response.text();
            } else {
                throw new Error('Tipo de respuesta no soportado');
            }

        } catch (error) {
            console.error('Error:', error);
            throw error;
        }
    }
};
