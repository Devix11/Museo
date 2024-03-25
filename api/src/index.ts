import fastify from 'fastify'
import path from 'path'

const server = fastify()

server.register(require('fastify-static'), {
    root: path.join(__dirname, 'folders'),
})

server.get('/ping', async (request, reply) => {
    return 'pong\n'
})

server.get('/exhibitions', async (request, reply) => {
    const fs = require('fs').promises;
    const folderPath = path.join(__dirname, 'exhibitions');
    try {
      const files = await fs.readdir(folderPath);
      const images = files.filter((file: string) => /\.(jpg|jpeg|png|gif)$/i.test(file));
      reply.send(images);
    } catch (error) {
      reply.code(500).send({ error: 'Internal Server Error' });
    }
})

server.get('/test', async (request, reply) => {
    reply
    .code(200)
    .header('Content-Type', 'application/json; charset=utf-8')
    .send({ hello: 'world' })
})

// IN PRODUCTION CHANGE TO 127.0.0.1
server.listen({ host: "0.0.0.0", port: 3338 }, (err, address) => {
if (err) {
    console.error(err)
    process.exit(1)
}
console.log(`Server listening at ${address}`)
})